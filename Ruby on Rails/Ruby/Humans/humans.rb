class Human
    attr_accessor :strength, :intelligence, :stealth, :health
    def initialize
        @strength = 3
        @intelligence = 3
        @stealth = 3
        @health = 100
    end
    def attack param
        if param.class.ancestors.include?(Human)
            param.health -= 10
            true
        else
            false
        end
    end
    
end

human1 = Human.new
human2 = Human.new
human1.attack(human2)
puts human2.health

  