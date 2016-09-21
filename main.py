import polib
from nltk import bigrams
import collections
import math
import functions

po = polib.pofile('/Users/thaothai/Desktop/Terminology_Creation/customizableWidgets.properties.po')
BigramSource = []
BigramTarget = []
NumberOfSentences= len(po.translated_entries())
PossiblePairs = []
Source = {}
Target = {}
#Create a list for english and translated terms 
for entry in po.translated_entries():
      SplitSource = entry.msgid.upper().split()
      SplitTarget = entry.msgstr.upper().split()
      functions.count_word(SplitSource, Source)
      functions.count_word(SplitTarget, Target)
      
#Calculate the probability of each word in the sentences
functions.probability_one_language(Source,NumberOfSentences)
functions.probability_one_language(Target, NumberOfSentences)
print Source
print Target 

PossiblePMIPairs = functions.probability_languages(Source, Target, PossiblePairs, NumberOfSentences)
print PossiblePMIPairs
            
##      for y in translation:
##            z =  x*y / sents
##            PMI = log (z)/(x*y)
## create a list of tupe {english,translate,PMI}
            
##print sents
##print count_eng
##print prob_engwrd
##print prob_transwrd




