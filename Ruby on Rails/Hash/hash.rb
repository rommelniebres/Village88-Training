# .delete(key) => deletes and returns a value associated with the key
h = {:first_name => "Coding", :last_name => "Dojo"}
h.delete(:last_name) 
puts "Delete: #{h}"

# .empty? => returns true if hash contains no key-value pairs
h = {:first_name => "Coding", :last_name => ""}
puts "Empty" if h[:last_name].empty? 

# .has_key?(key) => true or false
h = {:first_name => "Coding", :last_name => "Dojo"}
puts "Has a key of last_name" if h.has_key?(:last_name)

# .has_value?(value) => true or false
h = {:first_name => "Coding", :last_name => "Dojo"}
puts "Has a value of 'Dojo'" if h.has_value?("Dojo")
