pragma solidity ^0.5.1;
pragma experimental ABIEncoderV2;

contract kwiktrust {
    address owner;

    struct userStruct {
        bytes signature;
        uint initializationTime;
        uint expirationTime;
        uint id;
    }

    mapping (uint => userStruct[]) data;

    constructor() public {
        owner = msg.sender;
    }

    modifier isOwner {
        require(msg.sender == owner, "You do not have permissions to do it");
        _;
    }

    function add(uint hash, bytes memory _signature, uint _initializationTime, uint _expirationTime, uint _id) public {
        require(msg.sender == owner);
        data[hash].push(
            userStruct(
                {
                    signature: _signature,
                    initializationTime:_initializationTime,
                    expirationTime: _expirationTime,
                    id: _id
                }
            )
        );
    }

    function get(uint hash) public view returns(userStruct[] memory) {
        return data[hash];
    }

    function remove(uint _id, uint hash) public returns(userStruct memory) {
        uint length = data[hash].length;
        uint i = 0;
        for(i; i < length; i++) {
            if(data[hash][i].id == _id) {
                delete data[hash][i];
            }
        }
    }
}
