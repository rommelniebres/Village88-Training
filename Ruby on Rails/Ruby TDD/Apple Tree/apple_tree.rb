class AppleTree
    attr_accessor :age
    attr_reader :height, :apple_count
    def initialize
        @age = age
        @height = 20
        @apple_count = 200
    end

    def year_gone_by
        @age += 1
        if @age < 3 || @age > 10
            @height
            @apple_count
        else
            @height += @height.to_f * 0.1
            @apple_count += 2
        end
        puts "Year gone by, age: #{@age}, height: #{@height}, apple count: #{apple_count}"
    end

    def pick_apples
        @apple_count = 0
        puts "Apples picked, apple count is now #{apple_count}"
    end


end