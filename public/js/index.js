document.addEventListener('DOMContentLoaded', function () {
  {//姓
    let lastname = document.getElementById('lastname');
    lastname.oninput = function () {
      let error = document.getElementById('lastname-error');
      error.innerHTML = '';
      if (this.value == '') {
        error.innerHTML = '姓は入力必須です';
      }
    }
  }
  {//名
    let firstname = document.getElementById('firstname');
    firstname.oninput = function () {
      let error = document.getElementById('firstname-error');
      error.innerHTML = '';
      if (this.value == '') {
        error.innerHTML = '名は入力必須です';
      }
    }
  }
  {//メールアドレス
    let email = document.getElementById('email');
    email.oninput = function () {
      let error = document.getElementById('email-error');
      error.innerHTML = ''  
      if (this.value == '') {
        error.innerHTML = 'メールアドレスは入力必須です';
      } else if (!this.value.match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)) {
        error.innerHTML = 'メールアドレスの形式で入力してください';
      }
    }
  }
  {//郵便番号
    function convertToHalfwidthNumber(str) {
      str = str
        .replace(/[０-９．]/g, function (s) {
          return String.fromCharCode(s.charCodeAt(0) - 65248);
        })
        .replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-')
        .replace(/[^\-\d\.]/g, '');
              // .replace(/(?!^\-)[^\d\.]/g, '');
      return str;
    }
    let postcode = document.getElementById('postcode');
    postcode.oninput = function () {
      //全角数字を半角に変換
      this.value = convertToHalfwidthNumber(this.value);
      let error = document.getElementById('postcode-error');
      error.innerHTML = '';
      if (this.value.match(/^\d{3}-\d{4}$/)) {
        return;
      }
      if (this.value == '') {
        error.innerHTML = '郵便番号は入力必須です';
      } else if (this.value.length != 8) {
        error.innerHTML = '郵便番号は8文字で入力してください';
      } else {
        error.innerHTML = '郵便番号に正しい形式を指定してください';
      }
    }
  }
  {//住所
    let address = document.getElementById('address');
    address.oninput = function () {
      let error = document.getElementById('address-error');
      error.innerHTML = '';
      if (this.value == '') {
        error.innerHTML = '住所は入力必須です';
      }
    }
  }
  {//ご意見
    let inquiry = document.getElementById('opinion');
    inquiry.oninput = function () {
      let error = document.getElementById('opinion-error');
      error.innerHTML = '';
      if (this.value == '') {
        error.innerHTML = 'ご意見は入力必須です';
      } else if (this.value.length > 120) {
        error.innerHTML = 'ご意見は120文字以内で入力してください';
      }
    }
  }
});
