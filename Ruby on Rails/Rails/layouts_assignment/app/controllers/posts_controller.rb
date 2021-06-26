class PostsController < ApplicationController
  layout 'three_column'
  def index
      @posts = Post.all
      
  end
end
