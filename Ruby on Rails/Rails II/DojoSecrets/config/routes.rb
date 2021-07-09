Rails.application.routes.draw do 
  resources :users, :secrets, :likes, :sessions
  #secret
  post '/secrets/:id' => 'secrets#create'
  post '/secrets/delete/:id' => 'secrets#delete'
  #likes
  post '/likes/:id' => 'likes#create'
  delete '/likes/:id' => 'likes#destroy'
  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
