# #public
# class Mammal
#     def breath  
#       puts "Inhale and exhale"
#     end
    
#     def eat
#       puts "Yum yum yum"
#     end
#   end
#   class Human < Mammal # Human inherits from Mammal
#     def subclass_method
#       breath
#     end
#     def another_method
#       self.eat
#     end
#   end
#   person = Human.new
#   person.subclass_method
#   person.another_method

  #protected
#   class Mammal
#     # previous code removed for brevity
    
#     def calling_speak
#       speak
#     end
    
#     protected
#       def speak
#         puts "I am a protected method"
#       end
#   end
#   class Human < Mammal
#     # previous code removed for brevity
    
#     def explicitly_speak
#       self.speak
#     end
    
#     def implicitily_speak
#       speak
#     end
#   end
#   mammal = Mammal.new
#   mammal.speak # => protected method `speak' called for #<Mammal:0x007fa5438183d8> (NoMethodError)
#   mammal.calling_speak # => I am a protected method
#   person = Human.new
#   person.speak # => protected method `speak' called for #<Human:0x007fedfe824710> (NoMethodError)
#   person.explicitly_speak # => I am a protected method
#   person.implicitily_speak # => I am a protected method

#PRIVATE

class Mammal
    # previous code removed for brevity
    def calling_cry
      cry
    end
    
    private
    def cry
        puts "Sniff sniff..."
    end
end
class Human < Mammal
    # previous code removed for brevity
    def explicitly_cry
      self.cry
    end
    
    def implicitly_cry
      cry
    end
end
mammal = Mammal.new
mammal.calling_cry # => Sniff sniff...
mammal.cry # => private method `cry' called for #<Mammal:0x007fd9830de5f8> (NoMethodError)
person = Human.new
person.cry # => private method `cry' called for #<Human:0x007f8f298de248> (NoMethodError)
person.explicitly_cry # => `explicitly_cry': private method `cry' called for #<Human:0x007f87a30bf450> (NoMethodError)
person.implicitly_cry # => Sniff sniff...