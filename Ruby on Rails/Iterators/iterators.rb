# .any? { |obj| block } => true or false
# e.g. ["ant", "bear", "cat"].any? { |word| word.length >= 3 } # => true
puts '**********.any?**********'
puts [0, 1, 2].any? {|element| element > 1 } # => true
puts [0, 1, 2].any? {|element| element > 2 } # => false

# .each => calls block once for each element in ruby self, passing that element as a block parameter.
# e.g. ["ant", "bear", "cat"].each { |word| print word, "--" } # => ant--bear--cat--
puts '**********.each**********'
a = [:foo, 'bar', 2]
a.each {|element|  puts "#{element.class} #{element}" }
# .collect { |obj| block } => returns a new array with the results of running block once for every element in enum
# e.g. (1..4).collect { |i| i*i } # => [1, 4, 9, 16]
# e.g. (1..4).collect { "cat" } # => ["cat", "cat", "cat", "cat"]
puts '**********.collect**********'

# .detect/.find => returns the first for which block is not false.
# e.g. (1..10).detect { |i| i %5 == 0 and i % 7 == 0 } # => nil
# e.g. (1..100).detect { |i| i %5 == 0 and i % 7 == 0 } # => 35
puts '**********.detect**********'

# .find_all { |obj| block } or .select { |obj| block } => returns an array containing all elements of enum for which block is not false
# e.g. (1..10).find_all { |i| i % 3 == 0 } # => [3, 6, 9]
puts '**********.find_all**********'

# .reject { |obj| block } => opposite of find_all
# e.g. (1..10).reject { |i| i % 3 == 0 } # => [1, 2, 4, 5, 7, 8, 10]
puts '**********.reject**********'
arr = [1, 2, 3, 4, 5, 6]
arr.select {|a| a > 3}       #=> [4, 5, 6]
arr.reject {|a| a < 3}       #=> [3, 4, 5, 6]
arr.drop_while {|a| a < 4}   #=> [4, 5, 6]
arr                          #=> [1, 2, 3, 4, 5, 6]
# .upto(limit) => iterates block up to the int number
# e.g. 5.upto(10) { |i| print i, " " } # => 5 6 7 8 9 10
puts '**********.upto(limit)**********'