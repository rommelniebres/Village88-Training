class CreateNinjas < ActiveRecord::Migration[6.1]
  def change
    create_table :ninjas do |t|
      t.references :dojo, null: false, foreign_key: true
      t.string :first_name
      t.string :last_name

      t.timestamps
    end
  end
end
