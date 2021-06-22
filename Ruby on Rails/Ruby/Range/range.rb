# .include?(value) => true or false
# .last => returns the last object in range
# .max => returns the maximum value in range
# .min => returns the minimum value in range

x = (1..10)

puts "It does include a number 5!" if x.include? 5
puts "The last element of the array is #{x.last}"
puts "The maximum element of the array is #{x.max}"
puts "The minimum element of the array is #{x.min}"
