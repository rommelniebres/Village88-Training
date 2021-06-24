#  Create 5 users
#  5 times of..
User.create(first_name: 'John', last_name: 'Doe', email_address: 'john@doe.com') 
#  Create 5 blogs
#  5 times of..
Blog.create(name:'Blog 1', description: 'Blog for first user')
#  Have the first 3 blogs be owned by the first user
Owner.create(user:User.first, blog:Blog.first)
Owner.create(user:User.first, blog:Blog.second)
Owner.create(user:User.first, blog:Blog.third)
#  Have the 4th blog you create be owned by the second user
Owner.create(user:User.second, blog:Blog.fourth)
#  Have the 5th blog you create be owned by the last user
Owner.create(user:User.last, blog:Blog.last)
#  Have the third user own all of the blogs that were created.
Owner.create(user:User.third, blog:Blog.find(1))
Owner.create(user:User.third, blog:Blog.find(2))
Owner.create(user:User.third, blog:Blog.find(3))
Owner.create(user:User.third, blog:Blog.find(4))
Owner.create(user:User.third, blog:Blog.find(5))
#  Have the first user create 3 posts for the blog with an id of 2. Remember that you shouldn't do Post.create(user: User.first, blog_id: 2) but more like Post.create(user: User.first, blog: Blog.find(2)). Again, you should never reference the foreign key in Rails.
Post.create(blog: Blog.second, user: User.third, title: 'User 3 post 1', content:'post of the third user')
Post.create(blog: Blog.second, user: User.third, title: 'User 3 post 2', content:'post of the third user')
Post.create(blog: Blog.second, user: User.third, title: 'User 3 post 3', content:'post of the third user')
#  Have the second user create 5 posts for the last Blog.
Post.create(blog: Blog.last, user: User.second, title: 'User 2 post 1', content:'post of the second user')
Post.create(blog: Blog.last, user: User.second, title: 'User 2 post 2', content:'post of the second user')
Post.create(blog: Blog.last, user: User.second, title: 'User 2 post 3', content:'post of the second user')
Post.create(blog: Blog.last, user: User.second, title: 'User 2 post 4', content:'post of the second user')
Post.create(blog: Blog.last, user: User.second, title: 'User 2 post 5', content:'post of the second user')
#  Have the 3rd user create several posts for different blogs.
Post.create(blog: Blog.third, user: User.third, title: 'User 3 post 3', content:'something')
#  Have the 3rd user create 2 messages for the first post created and 3 messages for the second post created
Message.create(post: Post.first, user: User.third, author: User.third.first_name, message:'message of third user')
Message.create(post: Post.first, user: User.third, author: User.third.first_name, message:'message of third user')
#  Have the 4th user create 3 messages for the last post you created.
Message.create(post: Post.last, user: User.fouth, author: User.fouth.first_name, message:'message of fouth user')
Message.create(post: Post.last, user: User.fouth, author: User.fouth.first_name, message:'message of fouth user')
Message.create(post: Post.last, user: User.fouth, author: User.fouth.first_name, message:'message of fouth user')
#  Change the owner of the 2nd post to the last user.
Post.second.update(user: User.last)
#  Change the 2nd post's content to be something else.
Post.second.update(content: 'updated content')
#  Retrieve all blogs owned by the 3rd user (make this work by simply doing: User.find(3).blogs).
class User < ApplicationRecord
    has_many :owners
    has_many :blogs, through: :owners

class Blog < ApplicationRecord
    has_many :owners
    has_many :users, through: :owners

User.find(3).blogs
#  Retrieve all posts that were created by the 3rd user
User.find(3).posts
#  Retrieve all messages left by the 3rd user
User.find(3).messages
#  Retrieve all posts associated with the blog id 5 as well as who left these posts.
Post.find_by(blog_id: 5).user
#  Retrieve all messages associated with the blog id 5 along with all the user information of those who left the messages
Post.find_by(blog_id: 5).messages
#  Grab all user information of those that own the first blog (make this work by allowing Blog.first.owners to work).
Blog.first.owners
#  Change it so that the first blog is no longer owned by the first user.
Blog.first.owners.update(user_id: 2)