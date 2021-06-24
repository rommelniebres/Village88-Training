Create model user and friendships

In friendships migration file add this:
    t.references :friend, references: :users, foreign_key: {to_table: :users}
    explanation: 
    friend table doesnt exist so reference it to users("t.references :friend, references: :users")
    for the id use the user_id("foreign_key: {to_table: :users}")
In friendship model add this:
    belongs_to :friend, class_name: 'User'
    explanation: 
        friend reference to the class User instead of class Friend because we dont have that class called "Friend"
In the user file we add association 
    has_many :friendships
    has_many :friends, through: :friendships
    