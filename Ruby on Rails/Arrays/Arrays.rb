# .at or .fetch
puts '**********.at and .fetch**********'
a = [:foo, 'bar', 2]
puts a.at(0) # => :foo
puts a.at(2) # => 2

puts a.fetch(-1) # => 2
puts a.fetch(-2) # => "bar"

# .delete
puts '**********.delete**********'
s1 = 'bar'; s2 = 'bar'
a = [:foo, s1, 2, s2]
a.delete('bar') # => "bar"
puts a.to_s # => [:foo, 2]

# .reverse
puts '**********.reverse**********'
a = ['foo', 'bar', 'two']
a.reverse! # => ["two", "bar", "foo"]
puts a.to_s

# .length
puts '**********.length**********'
a = ['foo', 'bar', 'two']
puts a.length

# .sort
puts '**********.sort**********'
a = ['foo', 'bar', 'two']
puts a.sort.to_s

# .slice
puts '**********.slice**********'
a = [:foo, 'bar', 2]
a.slice!(1) # => "bar"
puts a.to_s 

# .shuffle
puts '**********.shuffle**********'
a = [1, 2, 3] #=> [1, 2, 3]
a.shuffle!    #=> [2, 3, 1]
puts a.to_s             #=> [2, 3, 1]

# .join
puts '**********.join**********'
a = [:foo, 'bar', 2]
$, # => nil
puts a.join.to_s # => "foobar2"

# .insert
puts '**********.insert**********'
a = [:foo, 'bar', 2]
a.insert(5, :bat, :bam)
puts a.to_s # => [:foo, "bar", 2, nil, nil, :bat, :bam]

# values_at() -> returns an array with values specified in the param
# e.g. a = %w{cat dog bear}; puts a.values_at(1,2).join(' and ') #=> "dog and bear"
puts '**********.sort**********'
a = [:foo, 'bar', 2]
puts a.values_at(0, 2).to_s # => [:foo, 2]
