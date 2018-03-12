// /**
//  * Created by Sijn on 01/02/2018.
//  */
// // file-upload.service.js
//
// import * as axios from 'axios';
//
// const BASE_URL = 'http://bloodthirstymonsters.local';
//
// function upload(formData) {
//     const url = `${BASE_URL}/photos/upload`;
//     return axios.post(url, formData)
//     // get data
//         .then(x => x.data)
//         // add url field
//         .then(x => x.map(img => Object.assign({},
//             img, { url: `${BASE_URL}/images/${img.id}` })));
// }
//
// export default { upload }