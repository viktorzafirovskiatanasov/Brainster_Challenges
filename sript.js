const Books = [
  {
    title: "The Hobbit",
    author: "J.R.R. Tolkien",
    maxPages: 200,
    onPage: 60,
  },
  {
    title: "Harry Potter",
    author: "J.K Rowling",
    maxPages: 250,
    onPage: 150,
  },
  {
    title: "50 Shades of Grey",
    author: "E.L. James",
    maxPages: 150,
    onPage: 150,
  },
  {
    title: "Don Quixote",
    author: "Miguel de Cervantes",
    maxPages: 350,
    onPage: 300,
  },
  {
    title: "Hamlet",
    author: "William Shakespeare",
    maxPages: 550,
    onPage: 550,
  },
];
let bookList = document.querySelector("#books");
let booksStatus = document.querySelector("#booksStatus");

function ListAllBooks() {
  bookList.innerHTML = '';
  Books.forEach((book) => {
    let firstLi = document.createElement("li");
    firstLi.textContent = `"${book.title}" by ${book.author}`;
    bookList.appendChild(firstLi);
  });
}

function BooksStatus() {
  booksStatus.innerHTML = '';
  Books.forEach((book) => {
    let secondLi = document.createElement("li");
    if (book.onPage === book.maxPages) {
      secondLi.style.color = "green";
      secondLi.textContent = `You already read "${book.title}" by ${book.author}`;
    } else {
      secondLi.style.color = "red";
      secondLi.textContent = `You still need to read "${book.title}" by ${book.author}`;
    }
    booksStatus.appendChild(secondLi);
  });
}
ListAllBooks();
BooksStatus();
let bookTable = document.querySelector("#bookTable tbody");
function updateTable() {

  while (bookTable.firstChild) {
    bookTable.removeChild(bookTable.firstChild);
  }

 
  const header = bookTable.insertRow();
  header.innerHTML = `
    <th>Title</th>
    <th>Author</th>
    <th>On Page</th>
    <th>Max Pages</th>
    <th>Progress</th>
  `;

  
  Books.forEach((book) => {
    const row = bookTable.insertRow();
    const fill = Math.ceil((book.onPage / book.maxPages) * 100);
    row.innerHTML = `
      <td>${book.title}</td>
      <td>${book.author}</td>
      <td>${book.onPage}</td>
      <td>${book.maxPages}</td>
      <td>
        <div class="progress-bar">
          <div class="progress-fill" style="width: ${fill}%"><p>${fill}%</p></div>
        </div>
      </td>
    `;
  });
}
updateTable();

addBookForm.addEventListener("submit", function (e) {
  e.preventDefault();
  const title = document.querySelector("#title").value;
  const author = document.querySelector("#author").value;
  const maxPages = parseInt(document.querySelector("#maxPages").value);
  const onPage = parseInt(document.querySelector("#onPage").value);

  const book = {
    title,
    author,
    onPage,
    maxPages,
  };
  Books.push(book);
  updateTable();
  ListAllBooks();
BooksStatus();
  addBookForm.reset();
});
