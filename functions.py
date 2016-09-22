import polib
from nltk import bigrams
import collections
import math 
from Translate_Object import Translate
import random
import string 

#ID Generator
def id_generator(size=6, chars=string.ascii_uppercase + string.digits):
      return ''.join(random.choice(chars) for _ in range(size))

#A function that adds counts to the each word found in the entries
def count_word(WordList, Index_Language, RandomMsgID):
      for word in WordList:
            if word in Index_Language.keys():
                  Index_Language[word].append(RandomMsgID)
            else:
                  Index_Language[word] = [RandomMsgID]
                  
###Calculate the p(Lword) per language
##def probability_one_language(Language,NumberOfSentences):
##      for key in Language:
####            Language[key] = round(float(Language[key])/NumberOfSentences,4)

#Filter out any key that has appear in less than 3 sentences
def filter_pairs(Index_Language):
      for key in Index_Language.keys():
            if len(Index_Language[key]) < 3:
                  try:
                        del Index_Language[key]
                  except KeyError:
                        pass
#Filter out key with the same list of message ID
def filter_keys_list( Index_Source, Index_Target):
      for key in Index_Source:
            if Index_Source[key] not in Index_Target.values():
                  try:
                        del Index_Source[key]
                        del Index_Target[key]
                  except KeyError:
                        pass

#Calculate the P(Lword1,Lword2)                
def probability_languages(SourceLanguage,  TargetLanguage, PossiblePairsList, NumberOfSentences):
      for key in SourceLanguage:
            for key2 in TargetLanguage:
                  if set(SourceLanguage[key]) <= set (TargetLanguage[key2]) or set(TargetLanguage[key2]) <= set(SourceLanguage[key]):
                        key_probability = round(float(len(SourceLanguage[key]))/NumberOfSentences,4)
                        key2_probability = round(float(len(TargetLanguage[key2]))/NumberOfSentences,4)
                        if set(SourceLanguage[key]) <= set (TargetLanguage[key2]) :
                              AppearTogether = round(float(len(SourceLanguage[key]))/NumberOfSentences,4)
                        elif set(TargetLanguage[key2]) <= set(SourceLanguage[key]):
                              AppearTogether = round(float(len(TargetLanguage[key2]))/NumberOfSentences,4)
                        PMI = round(math.log((AppearTogether/(key_probability*key2_probability)),10),4)
                        Possible_Pairs = Translate(key,key2,PMI)
                        PossiblePairsList.append(Possible_Pairs)
      return PossiblePairsList

