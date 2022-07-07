import { ObjProduto } from "../interfaces/iProduto";
import { ObjUsuario } from "../interfaces/iUsuario";
import { ObjFormaPgto} from '../interfaces/iFormaPgto';
import { ObjCliente } from "../interfaces/iCliente";
import { ObjVenda } from '../interfaces/iVenda';

export const ActionUsuario = (type: string) => {
  function Payload(payload: ObjUsuario[]) {
    return {
      type,
      payload
    };
  }
  Payload.type = type;
  return Payload;
};


export const ActionProduto = (type: string) => {
  function Payload(payload: ObjProduto[]) {
    return {
      type,
      payload
    };
  }
  Payload.type = type;
  return Payload;
};

export const ActionFormaPgto = (type: string) => {
  function Payload(payload: ObjFormaPgto[]) {
    return {
      type,
      payload
    };
  }
  Payload.type = type;
  return Payload;
};

export const ActionCliente = (type: string) => {
  function Payload(payload: ObjCliente[]){
    return {
      type,
      payload
    };
  }
  Payload.type = type;
  return Payload;
}

export const ActionVenda = (type: string) => {
  function Payload(payload: ObjVenda[]){
    return {
      type,
      payload
    };
  }
  Payload.type = type;
  return Payload;
}