import * as types from './mutation-types'

const mutations = {
  [types.TRIGGER_MOBILE_MENU](state, value) {
    state.mobileMenu = value
  },
}

export default mutations
