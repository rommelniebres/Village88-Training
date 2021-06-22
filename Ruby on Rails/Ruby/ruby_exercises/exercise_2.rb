# age = 22
# if age >= 21
#   puts "Welcome to the party"
# else
#   puts "Not yet"
# end

# number = 15
# if number % 3 == 0 && number % 5 == 0
#   puts "FizzBuzz"
# elsif number % 3 == 0
#   puts "Fizz"
# elsif number % 5 == 0
#   puts "Buzz"
# end

# age = 22
# if !(age < 21)
#     puts "Welcome to the party"
# else
#     puts "Not yet"
# end

# unless age < 21
#     puts "Welcome to the party"
# else
#     puts "Not yet"
# end

# if ""
#     puts "I am positive"
#   end
#   if 0
#     puts "I am positive"
#   end

#   unless nil
#     puts "I am negative"
#   end
#   unless false
#     puts "I am negative"
#   end

# puts "I am positive" if "hello"
# puts "I am positive" if 24
# puts "I am negative" unless nil
# puts "I am negative" unless false

# i = 0
# num = 5
# while i < num do
#    puts "Inside the loop i = #{i}"
#    i +=1
# end

# i = 0
# num = 5
# while i < num do
#   puts "Inside the loop i = #{i}"
#   i += 1  
#   break if i == 2  
# end

# for i in 0..5 
#     puts "Value of local variable is #{i}" 
#   end

# for i in 0..5 
#     puts "Value of local variable is #{i}" 
#     break if i == 2
# end

# for i in 0..5 
#     next if i == 2
#     puts "Value of local variable is #{i}"   
#   end

# def hello_world
#     puts "hello world"
#   end
#   hello_world

# def say_hello name1, name2
#     puts "hello, #{name1} and #{name2}"
#   end
#   say_hello "oscar", "eduardo" # => "hello, oscar and eduardo"

# or

# def say_hello(name1, name2)
#     puts "hello, #{name1} and #{name2}"
#   end
#   say_hello("oscar", "eduardo") # => "hello, oscar and eduardo"

# def say_hello name1="oscar", name2="shane"
#     puts "hello, #{name1} and #{name2}"
#   end
#   say_hello "oscar"    # => "hello, oscar and shane"

# def say_hello name1="oscar", name2="shane"
#     "hello, #{name1} and #{name2}"
#   end
#   puts say_hello "oscar", "eduardo"   # => "hello, oscar and eduardo"

def say_hello name1, name2
    if name1.empty? or name2.empty?
      return "Who are you?!"
    end
    # Doesn't reach the last line because we used return
    "hello, #{name1} and #{name2}"
  end
  puts say_hello "Rommel", "Dilan"