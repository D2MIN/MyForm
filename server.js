const http = require('http');
const querystring = require('querystring');
const mysql = require('mysql2');
const {validateData,makeLengsArr,InsertLengs,HTMLAnswer,HTMLTables} = require('./script.js');

const server = http.createServer((req, res) => {
  if (req.method === 'POST' && req.url == "/answer") {
    // Собрать тело запроса из кусков
    const body = [];
    req.on('data', chunk => {
      body.push(chunk);
    });

    req.on('end', () => {
      // Объединить куски в строку и распарсить в объект
      const bodyString = Buffer.concat(body).toString();
      const bodyObject = querystring.parse(bodyString);

      // Получить данные из объекта
      const name = bodyObject.name;
      const number = bodyObject.number;
      const email = bodyObject.email;
      const date = bodyObject.date;
      const gen = bodyObject.gen;
      const about = bodyObject.about;
      const login = bodyObject.login;
      const pass = bodyObject.pass;
      const lengs = makeLengsArr(bodyObject);
      
      res.setHeader('Content-Type', 'text/html; charset=utf-8');
      res.writeHead(200);
      if(validateData(name,number,date)[1] == 0){
        res.end(HTMLAnswer(validateData(name,number,date)[0]));
      }else{
        res.end(HTMLAnswer(validateData(name,number,date)[0]));

      //Заполнение данных в базу данных
      // Подключение к бд
      const db = mysql.createConnection({
        host:"localhost",
        user:"d2min",
        password:"Qwerty40982",
        database:"Form",
      });
      
      db.connect((err)=>{
        if(err) throw err;
        console.log("Connected to MySQL database");
      });

      //составление sql запроса
      let userId = '';
      let sql = 'INSERT INTO users(name, number, mail, date, gen, about, pass, login) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
      db.query(sql, [name, number, email, date, gen, about, login, pass], async (err, res) => {
        if (err) throw err;
        console.log("data users save");
        userId = res.insertId;

        console.log(lengs);
        for (leng in lengs) {
          // составление sql запроса
          sql = `INSERT INTO user_lengs(user_id, leng_id) SELECT ${userId}, lengs.id FROM lengs WHERE lengs.leng = '${lengs[leng]}'`;

          // отправка sql запроса
          await new Promise((resolve, reject) => {
            db.query(sql, (err, res) => {
              if (err) reject(err);
              resolve();
            });
          });
        }
      });


      };
    });
  }


  // Вывод таблицы в бд
  else  if (req.method === 'GET' && req.url === '/tables') {
    const db = mysql.createConnection({
      host: 'localhost',
      user: 'd2min',
      password: 'Qwerty40982',
      database: 'Form'
    });

    db.connect((err) => {
      if (err) throw err;
      console.log('Connected to MySQL database');

      // Выполнение SQL-запроса для выборки данных из таблицы
      const query = 'SELECT * FROM users join lengs on users.user_id = lengs.user_id';
      db.query(query, (err, results) => {
        if (err) throw err;

        // Генерация HTML-кода для отображения данных на странице
        let html = HTMLTables(results);

        // Отправка HTML-кода в ответ на запрос
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.end(html);
      });
    });
  }
  else{
    // Отправить ответ 404 Not Found для всех других запросов
    res.writeHead(404);
    res.end('Sorry bro Not Found - ' + req.url!='/tables');
  }
});

// Запустить сервер на порту 600
server.listen(600, function() {
  console.log('Сервер запущен на порту 600');
});
