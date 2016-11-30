import string

##Terminology_Creation

##Create a Translate class that populates by the source language, target language, and PMI of the possible pairs

class Translate(object):
      source = ""   #source language
      target = ""    #target language
      PMI = 0.0


      def __init__(self, source, target, PMI):
            self.source = source
            self.target = target
            self.PMI= PMI

      def __str__(self):
            return( self.source.encode('utf8') +  ": " + self.target.encode('utf8') + ":" + str(self.PMI))

      def __repr__(self):
            return str(self)
