import polib
from nltk import bigrams
import collections
import math
import functions
from Translate_Object import Translate

po = polib.pofile('/Users/thaothai/Desktop/Terminology_Creation/printing.properties.po')
BigramSource = []
BigramTarget = []
NumberOfSentences= len(po.translated_entries())
PossiblePairs = []
Index_Source = {}
Index_Target = {}

#Create a list for english and translated terms 
for entry in po.translated_entries():
      SplitSource = entry.msgid.upper().split()
      if len(SplitSource) == 1:
            TranslatedPairs = Translate(entry.msgid.upper(), entry.msgstr.upper(), 5)
            PossiblePairs.append(TranslatedPairs)
      else:
            MsgID = functions.id_generator()
            SplitTarget = entry.msgstr.upper().split()
            functions.count_word(SplitSource, Index_Source, MsgID)
            functions.count_word(SplitTarget, Index_Target, MsgID)

#Filter out any key that has less chance of appearing
functions.filter_pairs(Index_Source)
functions.filter_pairs(Index_Target)

print Index_Source
print "\n" 
print Index_Target
###Calculate the probability of each word in the sentences
##functions.probability_one_language(Source,NumberOfSentences)
##functions.probability_one_language(Target, NumberOfSentences)



PossiblePMIPairs = functions.probability_languages(Index_Source, Index_Target, PossiblePairs, NumberOfSentences)

            
##      for y in translation:
##            z =  x*y / sents
##            PMI = log (z)/(x*y)
## create a list of tupe {english,translate,PMI}
for x in PossiblePairs:
       print x

##print sents
##print count_eng
##print prob_engwrd
##print prob_transwrd




