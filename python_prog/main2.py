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


BigramSource = []
BigramTarget = []
PossiblePairs = []
Index_Source = {}
Index_Target = {}
NumberOfSentences = 0
pofiles = []
Coccurence ={}
dups = collections.defaultdict(list)


with open('/Users/thaothai/Desktop/Terminology_Creation/python/langfiles.txt') as name:
      namefile = name.read().splitlines()
      for text in namefile:
            with open('/Users/thaothai/Desktop/Terminology_Creation/python/languages/%s'%(text)) as f:
                  pofiles =  f.read().splitlines()
            file1 = open('/Users/thaothai/Desktop/Terminology_Creation/python/trans2.0/%s' %(text), 'w')

            for po_file in pofiles:
                  po = polib.pofile(po_file)
                  NumberOfSentences= len(po.translated_entries())
                  if NumberOfSentences == 0:
                        pass
                  else:
                        #Create a list for english and translated terms
                        for entry in po.translated_entries():
                              SplitSource = entry.msgid.upper().split()
                              SplitTarget = entry.msgstr.upper().split()
                              if len(SplitSource) <= 1:
                                    if len(SplitTarget) == 0 or len(SplitSource) == 0 or len(SplitSource[0]) == 1:
                                          file1.write("")
                                    else:
                                           word = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgid.upper().encode('utf-8'))
                                           word2 = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgstr.upper().encode('utf-8'))
                                           file1.write(word + "; " + word2 + '\n' )
                              else:
                                    MsgID = functions.id_generator()

                                    functions.count_word(SplitSource, Index_Source, MsgID)
                                    functions.count_word(SplitTarget, Index_Target, MsgID)
            if NumberOfSentences > 0:
                  #Filter out any key that has less chance of appearing
                  functions.filter_pairs(Index_Source)
                  functions.filter_pairs(Index_Target)

                  PossiblePMIPairs = functions.cPMId(Index_Source, Index_Target, PossiblePairs, NumberOfSentences)
                  functions.duplicates(PossiblePairs, dups)

                  for x in dups:
                        result = ""
                        for i in dups[x]:
                              if len(dups[x]) <4:
                                    result += " " + i
                              else:
                                    result = i
                        translate = str(x) + ";"
                        if translate not in open('/Users/thaothai/Desktop/Terminology_Creation/python/trans2.0/%s'%(text)).read():
                              file1.write(str(x) + ";" + result + "\n")


                  file1.close()
            else:
                  pass



