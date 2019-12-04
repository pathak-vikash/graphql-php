
## Run Server

php -S localhost:8080 index.php

## Browse Application

- Make sure you have any graphql api requester or do install [Postman!](https://www.getpostman.com/), [GraphiQL](https://github.com/graphql/graphiql) or just install the chrome extension [ChromeiQL](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij)

- Query

```
query {
  echo(message: "Hello World")
}
```