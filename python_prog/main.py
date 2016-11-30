
import polib
import math
import functions
from Translate_Object import Translate
import string
import re

BigramSource = []
BigramTarget = []
PossiblePairs = []
Index_Source = {}
Index_Target = {}
Coccurence = {}
NumberOfSentences = 0
pofiles = []


with open('/Users/thaothai/Desktop/Terminology_Creation/python/languages/vi.txt') as f:
      pofiles =  f.read().splitlines()
file1 = open('/Users/thaothai/Desktop/Terminology_Creation/python/trans1.0/vi.txt', 'w')
for po_file in pofiles:
      po = polib.pofile(po_file)
      NumberOfSentences= len(po.translated_entries())
      #Create a list for english and translated terms
      for entry in po.translated_entries():
            SplitSource = entry.msgid.upper().split()
            # if len(SplitSource) == 1:
            #       if len(SplitSource[0]) == 1:
            #             file1.write("")
            #       else:
            #             word = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\'\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgid.upper().encode('utf-8'))
            #             word2 = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\'\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgstr.upper().encode('utf-8'))
            #             file1.write(word + "; " + word2 + '\n')
            # else:
            MsgID = functions.id_generator()
            SplitTarget = entry.msgstr.upper().split()
            functions.count_word(SplitSource, Index_Source, MsgID)
            functions.count_word(SplitTarget, Index_Target, MsgID)

#Filter out any key that has less chance of appearing
functions.filter_pairs(Index_Source)
functions.filter_pairs(Index_Target)

PossiblePMIPairs = functions.probability_languages(Index_Source, Index_Target, PossiblePairs, NumberOfSentences)

for x in PossiblePairs:
      if x.source.encode('utf-8') not in open('/Users/thaothai/Desktop/Terminology_Creation/python/trans1.0/vi.txt').read():
            file1.write(x.source.encode('utf-8') + "; " + x.target.encode('utf-8')+ " " + str(x.PMI) + "\n")
file1.close()






