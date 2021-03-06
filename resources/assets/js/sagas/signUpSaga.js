import 'babel-polyfill';

import { take, fork, call, put, select } from 'redux-saga/effects';
import axios from 'axios';

import { formValues } from './selectors/signUpSelectors';

export function* signUpSagaWorker(action) {
  try {
    let data = yield select(formValues);
    let response = yield call(axios.post, '/sign-up', data);
    yield put({ type: 'SIGNUP_SEND_SUCCESSFUL' });
  } catch(exception) {
    if(!exception.response && exception.message.toLowerCase() == 'network error') {
      yield put({
        type: 'SIGNUP_SEND_FAILED',
        message: 'We couldn\'t connect to the server, please check your internet connection.'
      });
    } else if(exception.response.status == 422) {
      yield put({
        type: 'SIGNUP_SEND_FAILED',
        response: {...exception.response.data}
      });
    } else {
      yield put({
        type: 'SIGNUP_SEND_FAILED',
        message: 'We have encountered an unexpected error while processing your request. The server responded with the following `' + exception.response.status + ' : ' + exception.response.statusText + '`'
      });
    }
  }
}

export default function* signUpSagaWatcher() {
  while(true) {
    let action = yield take('SIGNUP_SEND_START');
    yield fork(signUpSagaWorker, action);
  }
}