 
import { defineStore } from 'pinia'

export const useCategoriesStore = defineStore({
  id: 'categories',
  state: () => ({
    categories: [
    // {
    //"id":"1",
    //"name":"Featured",
    //"description":"NULL",
    //}
    ]
  }),
  getters: {
    getCategories (state) {
      return state.categories;
    },   
  }, 
  actions: {
    addCategories(categories){
      this.categories = categories
    },
    async getCategoriesFromDB() {
            try {
                const response = await fetch('http://daw.deei.fct.ualg.pt/~a12345/RECURSO/api/coursecategories.php')
                const data = await response.json()
                console.log('received data:', data)                
                this.addCategories(data)
                return true
            } 
            catch (error) {
                console.log('error: ', error)
                return false
            }
        },
  },
})

  