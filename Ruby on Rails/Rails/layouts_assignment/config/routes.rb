Rails.application.routes.draw do
  get '/posts' => 'posts#index'
  get '/users' => 'users#index'
  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
