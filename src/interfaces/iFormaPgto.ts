import React from "react";

export interface ObjFormaPgto {
  id: number,
  nome: string,
  parcelas: number,
}

export interface iFormaPgto {
  state: {
    formapgtos: ObjFormaPgto[]
  }
  dispatch: React.Dispatch<{ payload: ObjFormaPgto[]; type: string;}>
}
