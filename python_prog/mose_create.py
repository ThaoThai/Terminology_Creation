import polib

import Translate_Object
import string
import re
import collections
import sys
reload(sys)
sys.setdefaultencoding('utf-8')




#with open('/Users/thaothai/Desktop/Terminology_Creation/translated_files/langfiles.txt') as name:
#      namefile = name.read().splitlines()
#for text in namefile:
with open('/Users/thaothai/Desktop/Terminology_Creation/translated_files/languages/ga_IE.txt') as f:
    pofiles =  f.read().splitlines()
    SourceFile = open('/Users/thaothai/Desktop/Terminology_Creation/results/ga/working/ga-en.en', 'w')
    TargetFile = open('/Users/thaothai/Desktop/Terminology_Creation/results/ga/working/ga-en.ga', 'w')
    Output = open('/Users/thaothai/Desktop/Terminology_Creation/results/ga/ga-premodel', 'w')
    for po_file in pofiles:
        print("File name is " + po_file + "\n")
        po = polib.pofile(po_file)
        NumberOfSentences= len(po.translated_entries())
        if NumberOfSentences == 0:
            continue
            #Create a list for english and translated terms
        for entry in po.translated_entries():
            english = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}|","", entry.msgid.encode('utf-8'))
            english = english.replace('\n', ' ')
            target = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgstr.encode('utf-8'))
            target = target.replace('\n', ' ')
            Source = english
            print(Source)
            Target = target
            print(Target)
            SourceCount = len(Source.split(" "))
            TargetCount = len(Target.split(" "))
            if SourceCount > 1 and TargetCount > 0:
                SourceFile.write(Source + "\n")
                TargetFile.write(Target + "\n")
            elif SourceCount == 1 and TargetCount > 0:
                Output.write(Source+";"+Target+"\n")
SourceFile.close()
TargetFile.close()