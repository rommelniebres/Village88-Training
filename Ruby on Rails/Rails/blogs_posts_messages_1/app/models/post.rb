class Post < ApplicationRecord
    validates :title, :content, presence: true, length: { minimum: 7 }
    validates :content, presence: true
    belongs_to :blog
    has_many :messages
    
    # know how to delete the third post (have the model automatically 
    # delete all messages associated with the third post when you delete 
    # the third post).
    before_destroy :destroy_messages

    private
        def destroy_messages
            self.messages.destroy_all
        end
end

# know how to retrieve all posts for the first blog.
# Post.first.messages

# know how to retrieve all posts for the last blog (sorted by title in the DESC order).
# Blog.last.posts.order(title: :desc)

# know how to update the first post's title.
# Post.first.update(title: 'updated_title')

# know how to delete the third post (have the model automatically delete all messages associated with the third post when you delete the third post).
# Post.third.destroy

# know how to retrieve all blogs.
# Blog.all

# know how to retrieve all blogs whose id is less than 5.
# Blog.where("id > ?", 5) 

