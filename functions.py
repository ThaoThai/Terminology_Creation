import polib
from nltk import bigrams
import collections
import math 
from Translate_Object import Translate

#A function that adds counts to the each word found in the entries
def count_word(count_lang):
      count = collections.Counter(count_lang)
      return count

#A function that adds counts to allocations found in entries
def count_bigram(count_lang):
      bigram = collections.Counter(bigrams(count_lang))
      return bigram

def prob_language(SourceLanguage,  TargetLanguage, PossiblePairsList, NumberOfSentences):
      for x in SourceLanguage:
            for y in TargetLanguage:
                  x_mul_y = float(SourceLanguage[x])*TargetLanguage[y]
                  Probability_XY = x_mul_y/NumberOfSentences
                  PMI = math.log((Probability_XY/x_mul_y),10)
                  Possible_Pairs = Translate(x,y,PMI)
                  PossiblePairsList.append(Possible_Pairs)
      return PossiblePairsList
      
