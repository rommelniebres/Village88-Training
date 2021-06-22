require_relative 'printer_module'
class Array
  include Printer
end
class String
  include Printer
end
[1,2,3].print_each_element
"hello".print_each_element

# .any? { |obj| block } => true or false
# e.g. ruby ["ant", "bear", "cat"].any? { |word| word.length >= 3 } # => true ```
# .collect { |obj| block } => returns a new array with the results of running block once for every element in enum
# e.g. ruby (1..4).collect { |i| i*i } # => [1, 4, 9, 16]
# e.g. ruby (1..4).collect { "cat" } # => ["cat", "cat", "cat", "cat"]
# .detect/.find => returns the first for which block is not false.
# e.g. ruby (1..10).detect { |i| i %5 == 0 and i % 7 == 0 } # => nil
# e.g. ruby (1..100).detect { |i| i %5 == 0 and i % 7 == 0 } # => 35
# .find_all { |obj| block } or .select { |obj| block } => returns an array containing all elements of enum for which block is not false
# e.g. ruby (1..10).find_all { |i| i % 3 == 0 } # => [3, 6, 9]
# .reject { |obj| block } => opposite of find_all
# e.g. ruby (1..10).reject { |i| i % 3 == 0 } # => [1, 2, 4, 5, 7, 8, 10]