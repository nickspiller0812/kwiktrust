export const appConfig={
    emailPrefix:'kwiktrust.com',
    email:{
        port:587,
        host:"auth.smtp.1and1.co.uk",
        secure:false,
        auth: {
            user: "admin@kwiktrust.com",
            // pass: "ktalex25"
            pass: "ktalex25s"
        }
    },
    tokenSalt:'EDEDDjjjj9i4903843LLLLLLaaaesd',
    projectName:'KwikTrust',
    url:'https://kwiktrust.com',
    // testnetAddr: 'ropsten-lvu6lk.blockscout.com/api',
    // testnetAddr: '127.0.0.1:8545',
    // testnetAddr: 'https://api-ropsten.etherscan.io?apikey=J51UN41E6Z5BJ2HZ8IQZU1D6IXQQNEB7F7',

    testnetAddr: 'https://ropsten.infura.io/v3/dda92a226b5b453aa9aacb82077977ec',
    issuerAddr: '0xaFd40Ed54483A7F9E53a634312Fe8F24f344895D',
    privateKey: '0x816088dd762afe86c68cad1f0f5e1b0422692c7c56e3c3cbe075933d5e179e19',
    smartContractHash: '0x1a04d5708d9d0c647105db042ad7459d3c8c1e2e',
    // smartContractHash: '0x549c493ba4dfb7d5f6ada489270087ae0472ddc6',
    //pub 0x62aE32C27B989BDA3DF8607CaCd556E91d882A3E
    //priv D26BB8919590BB51B04B0C287E657A0677928FC7D45241F4833F45AD701544E0
};
