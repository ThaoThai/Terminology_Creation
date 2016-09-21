import polib
from nltk import bigrams
import collections
import math 
from Translate_Object import Translate

#A function that adds counts to the each word found in the entries
def count_word(WordList, Language):
      for word in WordList:
            if word in Language.keys():
                  Language[word]+= 1
            else:
                  Language[word] = 1

def probability_one_language(Language,NumberOfSentences):
      for key in Language:
            Language[key] = float(Language[key])/NumberOfSentences
            
def probability_languages(SourceLanguage,  TargetLanguage, PossiblePairsList, NumberOfSentences):
      for key in SourceLanguage:
            for key2 in TargetLanguage:
                  x_mul_y = float(SourceLanguage[key])*TargetLanguage[key2]
                  Probability_XY = x_mul_y/NumberOfSentences
                  PMI = math.log((Probability_XY/x_mul_y),10)
                  Possible_Pairs = Translate(key,key2,PMI)
                  PossiblePairsList.append(Possible_Pairs)
      return PossiblePairsList
      
