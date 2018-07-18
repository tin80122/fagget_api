import * as types from './mutation-types'

const mutations = {
  [types.TRIGGER_MENU](state, value) {
    state.menu = value
  },
}

export default mutations
