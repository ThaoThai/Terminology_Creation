import polib
import math
import functions
from Translate_Object import Translate
import string

BigramSource = []
BigramTarget = []
PossiblePairs = []
Index_Source = {}
Index_Target = {}
NumberOfSentences = 0
pofiles = []


with open('/Users/thaothai/Desktop/Terminology_Creation/python/vi.txt') as f:
      pofiles =  f.read().splitlines()
      
for po_file in pofiles:
      po = polib.pofile(po_file)
      NumberOfSentences= len(po.translated_entries())
      #Create a list for english and translated terms 
      for entry in po.translated_entries():
            SplitSource = entry.msgid.upper().split()
##            SplitSource = functions.translate_non_alphanumerics(SplitSource).split()
##            if len(SplitSource) == 1:
##                  TranslatedPairs = Translate(entry.msgid.upper(), entry.msgstr.upper(), 5)
##                  PossiblePairs.append(TranslatedPairs)
##            else:
            MsgID = functions.id_generator()
            SplitTarget = entry.msgstr.upper().split()
##            SplitTarget = functions.translate_non_alphanumerics(SplitTarget).split()
            functions.count_word(SplitSource, Index_Source, MsgID)
            functions.count_word(SplitTarget, Index_Target, MsgID)

#Filter out any key that has less chance of appearing
functions.filter_pairs(Index_Source)
functions.filter_pairs(Index_Target)

###Calculate the probability of each word in the sentences
##functions.probability_one_language(Source,NumberOfSentences)
##functions.probability_one_language(Target, NumberOfSentences)

PossiblePMIPairs = functions.probability_languages(Index_Source, Index_Target, PossiblePairs, NumberOfSentences)

            
##      for y in translation:
##            z =  x*y / sents
##            PMI = log (z)/(x*y)
## create a list of tupe {english,translate,PMI}

PossiblePairs.sort(key=lambda x: x.PMI, reverse=True)
file1 = open('viTranslationNON.txt', 'w')
for x in PossiblePairs:
       file1.write(x.source.encode('utf-8') + ";" + x.target.encode('utf-8')  + " " + str(x.PMI) + "\n")
file1.close()
      ##print sents
      ##print count_eng
      ##print prob_engwrd
      ##print prob_transwrd




