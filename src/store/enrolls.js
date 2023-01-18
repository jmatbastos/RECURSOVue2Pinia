  const Enrolls = {
  namespaced: true,
  state: {
    Enrolls: 
    [
//      {
//         "course_name":"Javascript Course",
//         "teacher_name":"Peter Frampton",
//         "id":"3",
//         "enroll_date":"2022-12-18 20:38:19"
//       }
     ]
  },
  getters: {
    getEnrolls (state) {
      return state.Enrolls
    },   
  }, 
  mutations: {
    addEnrolls(state, Enrolls){
        state.Enrolls = Enrolls
    },
    newEnroll(state, order){
      state.Enrolls = [order, ...state.Enrolls]
    },
  },
  actions: {
    async getMyEnrollsFromDB({commit},id) {
            try {
                const response = await fetch(`http://daw.deei.fct.ualg.pt/~a12345/RECURSO/api/enrolls.php?user_id=${id}`)
                const data = await response.json()
                console.log('received data:', data)                
                commit('addEnrolls', data)
                return true
            } 
            catch (error) {
              console.log('error: ', error)
              return false
            }
        },
    async newEnroll({commit}, newEnroll) {         
          try {
              const response = await fetch('http://daw.deei.fct.ualg.pt/~a12345/RECURSO/api/enrolls.php', {
                  method: 'POST',
                  body: JSON.stringify(newEnroll),
                  headers: { 'Content-type': 'text/html; charset=UTF-8' },
              })
              const data = await response.json()
              console.log('received data:', data)
              commit('newEnroll', data)
              return true
          } 
          catch (error) {
              console.error(error)
              return false
          }
      },     
  },
  modules: {
  }
}
export default 
    Enrolls