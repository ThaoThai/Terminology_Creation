import polib
from nltk import bigrams
import collections
import math
from Translate_Object import Translate
import random
import string
import collections
import sys

reload(sys)
sys.setdefaultencoding('utf-8')


# ID Generator
def id_generator(size=8, chars=string.ascii_uppercase + string.digits):
    return ''.join(random.choice(chars) for _ in range(size))


# A function that adds counts to the each word found in the entries
def count_word(WordList, Index_Language, RandomMsgID):
    for word in WordList:
        if word in Index_Language.keys():
            Index_Language[word].append(RandomMsgID)
        else:
            Index_Language[word] = [RandomMsgID]


# Filter out any key that has appear in less than 3 sentences
def filter_pairs(Index_Language):
    for key in Index_Language.keys():
        if len(Index_Language[key]) < 4 or set("1234567890|[%$&;:#!\]\[@?<>*\'\"=+,-\.\)\(]|[...]|[--]").intersection(
                key.encode('utf-8')):
            try:
                del Index_Language[key]
            except KeyError:
                pass


def duplicates(PossiblePairs, dups):
    for item in PossiblePairs:
        dups[item.source].append(item.target)


# Calculate the P(Lword1,Lword2)
def probability_languages(SourceLanguage, TargetLanguage, PossiblePairsList, NumberOfSentences):
    for key in SourceLanguage:
        for key2 in TargetLanguage:
            if set(SourceLanguage[key]) <= set(TargetLanguage[key2]) or set(TargetLanguage[key2]) <= set(
                    SourceLanguage[key]):
                key_probability = round(float(len(SourceLanguage[key])) / NumberOfSentences, 4)
                key2_probability = round(float(len(TargetLanguage[key2])) / NumberOfSentences, 4)
                if set(SourceLanguage[key]) <= set(TargetLanguage[key2]):
                    AppearTogether = round(float(len(SourceLanguage[key])) / NumberOfSentences, 4)
                elif set(TargetLanguage[key2]) <= set(SourceLanguage[key]):
                    AppearTogether = round(float(len(TargetLanguage[key2])) / NumberOfSentences, 4)
                PMI = round(math.log((AppearTogether / (key_probability * key2_probability)), 10), 4)
                Possible_Pairs = Translate(key, key2, PMI)
                PossiblePairsList.append(Possible_Pairs)
    return PossiblePairsList


def cPMId(SourceLanguage, TargetLanguage, PossiblePairsList, NumberOfSentences):
    lmbda = 0.9
    # keyone = English
    for key in SourceLanguage:
        # keytwo= foreign
        for key2 in TargetLanguage:
            if set(SourceLanguage[key]) <= set(TargetLanguage[key2]) or set(TargetLanguage[key2]) <= set(
                    SourceLanguage[key]):
                key_probability = round(float(len(SourceLanguage[key])) / NumberOfSentences, 5)
                key2_probability = round(float(len(TargetLanguage[key2])) / NumberOfSentences, 5)
                if set(SourceLanguage[key]) <= set(TargetLanguage[key2]):
                    AppearTogether = round(float(len(SourceLanguage[key])) / NumberOfSentences, 5)
                elif set(TargetLanguage[key2]) <= set(SourceLanguage[key]):
                    AppearTogether = round(float(len(TargetLanguage[key2])) / NumberOfSentences, 5)
                cPMId = round(math.log(AppearTogether / (
                (key_probability * key2_probability / NumberOfSentences) + math.sqrt(key_probability) * math.sqrt(
                    math.log(0.9) / -2))), 5)
                if (cPMId * -1) <= 0.5:
                    pass
                else:
                    Possible_Pairs = Translate(key, key2, cPMId)
                    PossiblePairsList.append(Possible_Pairs)
    return PossiblePairsList

