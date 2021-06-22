def guess_number guess
    number = 25
    if guess < number
        puts "Guess was too low!"
        print "Guess a number: "
        guess_number gets.to_i

    elsif guess > number
        puts "Guess was too high!"  
        print "Guess a number: "
        guess_number gets.to_i
        
    else 
        puts "You got it!!!"
    end
end 
print "Guess a number: "
guess_number gets.to_i

