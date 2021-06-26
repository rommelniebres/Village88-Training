Rails.application.routes.draw do
    get 'dojos/index'
    get 'dojos/new' => 'dojos#new'
    root 'dojos#index'
    post 'dojos' => 'dojos#create'
    get 'dojos/:id' => 'dojos#show'
    get 'dojos/:id/edit' => 'dojos#edit'
    patch 'dojos/:id' => 'dojos#update'
    delete 'dojos/:id' => 'dojos#destroy'
    resources :dojos do
        resources :students
    end
    # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
