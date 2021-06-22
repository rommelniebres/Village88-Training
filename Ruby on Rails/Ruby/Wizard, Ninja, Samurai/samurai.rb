require_relative 'human'
class Samurai < Human
    @@samurai_count = 0
    def initialize
        super
        @@samurai_count += 1
        @health = 200
    end

    def death_blow obj
        if obj.class.ancestors.include?(Human)
            obj.health = 0
            true
        else
            false
        end
    end

    def get_away
       @health -= 15
    end

    def meditate
        @health = 200
    end

    def how_many
        @@samurai_count
    end
    
end

samurai = Samurai.new
samurai2 = Samurai.new

puts samurai.health
puts samurai.death_blow(samurai2)
puts samurai2.health
puts samurai.meditate
puts samurai.how_many