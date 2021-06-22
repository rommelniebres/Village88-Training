require_relative 'human'
class Ninja < Human
    def initialize
        super
        @stealth = 175
    end
    def steal obj
        if obj.class.ancestors.include?(Human)
            obj.health -= 20
            @health += 10
            true
        else
            false
        end
    end
    def get_away
       @health -= 15
    end
end

ninja = Ninja.new
ninja2 = Ninja.new

puts ninja.stealth
puts ninja.steal(ninja2)
puts ninja.health
puts ninja.get_away