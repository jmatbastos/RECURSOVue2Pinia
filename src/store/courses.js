 
  const courses = {
  namespaced: true,
  state: {
    courses: [
//      {
//        "cat_name":"Featured",
//        "teacher_name":"Patty Smith",
//        "teacher_image":"teacher_2.jpg",
//        "id":"1",
//        "name":"Literature Course",
//        "description":"The best!",
//        "price":"40",
//        "image":"course_1.jpg",
//        "sales":"345"
//    }
    ]
  },
  getters: {
    getCourses (state) {
      return state.courses;
    },   
  }, 
  mutations: {
    addCourses(state, courses){
        state.courses = courses
    },

    },
  actions: {
    async getCoursesFromDB({commit}) {
            try {
                const response = await fetch('http://daw.deei.fct.ualg.pt/~a12345/RECURSO/api/courses.php')
                const data = await response.json()
                console.log('received data:', data)                
                commit('addCourses', data)
                return true
            } 
            catch (error) {
                console.log('error: ', error)
                return false
            }
        },
  },
  modules: {
  }
}
export default 
    courses