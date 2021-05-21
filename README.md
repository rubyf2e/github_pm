## Swagger API Document 範例


### Dockerfile && docker-compose.yml
```
docker build -t github_pm .
docker-compose up
```


### swagger-ui


http://localhost:8080/swagger-ui/dist/index.html
<br>

### Webhook代理URL

https://docs.github.com/cn/developers/apps/getting-started-with-apps/setting-up-your-development-environment-to-create-a-github-app#step-1-start-a-new-smee-channel
<br>

https://www.jenkins.io/blog/2019/01/07/webhook-firewalls/
<br>
```
npm install --global smee-client
smee --help
smee --url https://smee.io/1QD0ajiPBm8xnSo --path /github-webhook/ --port 8080
```

