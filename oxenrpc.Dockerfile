FROM debian:bullseye-slim

WORKDIR /home

RUN apt-get update && apt-get install -y wget xz-utils && \
    wget https://github.com/oxen-io/oxen-core/releases/download/v10.1.2/oxen-linux-x86_64-10.1.2.tar.xz && \
    tar -xf oxen-linux-x86_64-10.1.2.tar.xz && \
    mv oxen-linux-x86_64-10.1.2/oxen-wallet-rpc /usr/local/bin/ && \
    chmod +x /usr/local/bin/oxen-wallet-rpc

COPY ./oxenrpc /home

#RUN oxen-wallet-rpc --daemon-address imaginary.stream:22023 --trusted-daemon --rpc-bind-port 12388 --wallet-file testwallet --password "" --disable-rpc-login

#ENTRYPOINT ["oxen-wallet-rpc"]
CMD ["oxen-wallet-rpc","--daemon-address", "imaginary.stream:22023", "--trusted-daemon", "--rpc-bind-ip", "0.0.0.0", "--confirm-external-bind", "--rpc-bind-port", "12388", "--wallet-file", "testwallet", "--password", "", "--disable-rpc-login"]