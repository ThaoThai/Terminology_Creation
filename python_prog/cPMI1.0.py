import polib
import math
import functions
import Translate_Object
import string
import re
import collections
import sys
reload(sys)
sys.setdefaultencoding('utf-8')



dict = ["ga_IE.txt"]
for text in dict:
      BigramSource = []
      BigramTarget = []
      PossiblePairs = []
      Index_Source = {}
      Index_Target = {}
      Sentences = 0
      pofiles = []
      Coccurence = {}
      dups = collections.defaultdict(list)
      with open('/Users/thaothai/Desktop/Terminology_Creation/translated_files/languages/%s'%(text)) as f:
            pofiles =  f.read().splitlines()
      file1 = open('/Users/thaothai/Desktop/Terminology_Creation/translated_files/trans2.0/%s' %(text), 'w')

      for po_file in pofiles:
            po = polib.pofile(po_file)
            NumberOfSentences= len(po.translated_entries())
            Sentences += NumberOfSentences
            if NumberOfSentences == 0:
                  continue
            #Create a list for english and translated terms
            for entry in po.translated_entries():
                  SplitSource = entry.msgid.split()
                  SplitTarget = entry.msgstr.split()
                  # if len(SplitSource) <= 1:
                  #       if len(SplitTarget) == 0 or len(SplitSource) == 0 or len(SplitSource[0]) == 1:
                  #             file1.write("")
                  #       else:
                  #              word = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgid.upper().encode('utf-8'))
                  #              word2 = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgstr.upper().encode('utf-8'))
                  #              file1.write(word + "; " + word2 + '\n' )
                  # else:
                  MsgID = functions.id_generator()

                  functions.count_word(SplitSource, Index_Source, MsgID)
                  functions.count_word(SplitTarget, Index_Target, MsgID)
      #Filter out any key that has less chance of appearing
      functions.filter_pairs(Index_Source)
      functions.filter_pairs(Index_Target)

      PossiblePMIPairs = functions.PMI(Index_Source, Index_Target, PossiblePairs, Sentences)

      for x in PossiblePMIPairs:
            if x.source.encode('utf-8') not in open('/Users/thaothai/Desktop/Terminology_Creation/translated_files/trans2.0/%s'%(text)).read():
                  file1.write(x.target.encode('utf-8') + ";" + x.source.encode('utf-8') + "\n")
      file1.close()