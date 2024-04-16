wget https://nodejs.org/dist/v15.9.0/node-v15.9.0-linux-x64.tar.xz

tar -xf node-v15.9.0-linux-x64.tar.xz 

cp -p node-v15.9.0-linux-x64/bin/node /usr/local/bin/ 

update-alternatives --install /usr/bin/node node /usr/local/bin/node 1 

rm -rf node-v15.9.0-linux-x64.tar.xz 

rm -rf node-v15.9.0-linux-x64 

curl -L https://www.npmjs.com/install.sh | sh 

update-alternatives --install /usr/bin/npm npm /usr/local/lib/node_modules/npm/bin/npm-cli.js 1 

update-alternatives --display npm