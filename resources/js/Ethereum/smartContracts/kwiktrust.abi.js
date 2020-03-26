export const kwikTrustAbi = [
    {
        "constant": false,
        "inputs": [
            {
                "name": "hash",
                "type": "uint256"
            },
            {
                "name": "_signature",
                "type": "bytes"
            },
            {
                "name": "_initializationTime",
                "type": "uint256"
            },
            {
                "name": "_expirationTime",
                "type": "uint256"
            },
            {
                "name": "_id",
                "type": "uint256"
            }
        ],
        "name": "add",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_id",
                "type": "uint256"
            },
            {
                "name": "hash",
                "type": "uint256"
            }
        ],
        "name": "remove",
        "outputs": [
            {
                "components": [
                    {
                        "name": "signature",
                        "type": "bytes"
                    },
                    {
                        "name": "initializationTime",
                        "type": "uint256"
                    },
                    {
                        "name": "expirationTime",
                        "type": "uint256"
                    },
                    {
                        "name": "id",
                        "type": "uint256"
                    }
                ],
                "name": "",
                "type": "tuple"
            }
        ],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "hash",
                "type": "uint256"
            }
        ],
        "name": "get",
        "outputs": [
            {
                "components": [
                    {
                        "name": "signature",
                        "type": "bytes"
                    },
                    {
                        "name": "initializationTime",
                        "type": "uint256"
                    },
                    {
                        "name": "expirationTime",
                        "type": "uint256"
                    },
                    {
                        "name": "id",
                        "type": "uint256"
                    }
                ],
                "name": "",
                "type": "tuple[]"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "inputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "constructor"
    }
];
