# Create an array with the following values: 3,5,1,2,7,9,8,13,25,32. 
# Print the sum of all numbers in the array. Also have the function 
# return an array that only include numbers that are greater than 10 
# (e.g. when you pass the array above, it should return an array with 
#     the values of 13,25,32 - hint: use reject or find_all method)
puts "************* 1 *****************"
x = [3,5,1,2,7,9,8,13,25,32]
sum = x.inject(0){|sum,x| sum + x }
greater_than_ten = x.find_all{|y| y > 10}
puts "The sum of array is #{sum}"
puts "The numbers greater than 10 is #{greater_than_ten}"
# Create an array with the following values: John, KB, Oliver, Cory, Matthew, Christopher. 
# Shuffle the array and print the name of each person. Have the program also return an array 
# with names that are longer than 5 characters.

puts "************* 2 *****************"
x = ['John', 'KB', 'Oliver', 'Cory', 'Matthew', 'Christopher']
for i in x.shuffle
    print "#{i}, "
    y = (y || []) << i if i.length > 5
end
puts
puts "More than 5 characters: #{y.to_s}"
# Create an array that contains all 26 letters in the alphabet (this array must have 26 values). 
# Shuffle the array and display the last letter of the array. Have it also display the first letter 
# of the array. If the first letter in the array is a vowel, have it display a message.

puts "************* 3 *****************"
x = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"]
x.shuffle!
puts "The last letter of the alphabet after the shuffle is #{x.last} and the first letter is #{x.first}"
puts "The first letter is a vowel" if ["A", "E", "I", "O", "U"].include?(x.first)
# Generate an array with 10 random numbers between 55-100.

puts "************* 4 *****************"
x = (55..100).to_a.sample(10)
puts x.to_s
# Generate an array with 10 random numbers between 55-100 and have it be sorted 
# (showing the smallest number in the beginning). Display all the numbers in the array. 
# Next, display the minimum value in the array as well as the maximum value

puts "************* 5 *****************"
x = (55..100).to_a.sample(10).sort!
puts "Sorted 10 random numbers: #{x}"
puts "Min number: #{x.first}"
puts "Max number: #{x.last}"

# Create a random string that is 5 characters long (hint: (65+rand(26)).chr returns a random character)
puts "************* 6 *****************"
x = (1..5).map { (65 + rand(26)).chr }.join
puts "Random 5 string: #{x}"
# Generate an array with 10 random strings that are each 5 characters long
puts "************* 7 *****************"
x = (1..10).map{(1..5).map { (65 + rand(26)).chr }.join}
puts "Random 10 Array 5 Strings: #{x}"