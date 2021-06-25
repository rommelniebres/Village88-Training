Rails.application.routes.draw do
    root 'rpgs#index'
    post '/farm' => 'rpgs#farm'
    post '/cave' => 'rpgs#cave'
    post '/casino' => 'rpgs#casino'
    post '/house' => 'rpgs#house'
    post '/reset' => 'rpgs#reset'
    # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
