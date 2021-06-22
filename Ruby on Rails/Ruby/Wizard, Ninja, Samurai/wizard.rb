require_relative 'human'
class Wizard < Human
    def initialize
        super
        @intelligence = 25
        @health = 50
    end
    def heal
        @health += 10
        self
    end
    def fireball obj
        if obj.class.ancestors.include?(Human)
            obj.health -= 20
            true
        else
            false
        end
    end
end

wizard = Wizard.new
wizard2 = Wizard.new

puts wizard.health
puts wizard.heal.health

wizard.fireball(wizard2)
puts wizard2.health