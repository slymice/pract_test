FROM node:alpine

RUN apk add --no-cache tini git \
    && yarn global add git-http-server \
    && adduser -D -g git git \
    && git config --global user.name "Che-Jing-Peng-Ivan" \
    && git config --global user.email "2103291@sit.singaporetech.edu.sg"

USER git
WORKDIR /home/git

RUN git init --bare repository.git

ENTRYPOINT ["tini", "--", "git-http-server", "-p", "3000", "/home/git"]
